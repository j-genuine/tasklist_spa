<template>
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">タスク</th>
                <th scope="col">内容</th>
                <th scope="col">担当者</th>
                <th scope="col">進捗率</th>
                <th scope="col"> </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="task in tasks">
                <th scope="row">{{ task.id }}</th>
                <td>
                    <router-link v-bind:to="{name: 'task.show', params: {taskId: task.id }}">
                    {{ task.title }}
                    </router-link>
                </td>
                <td>{{ task.content }}</td>
                <td>{{ task.person_in_charge }}</td>
                <td>
                    <select v-model="task.ratio" v-bind:value="task.ratio" v-on:change="changeRatio(task)">
                        <option v-for="ratio in ratios">{{ ratio }}</option>
                    </select> %
                </td>
                <td>
                    <router-link v-bind:to="{name: 'task.edit', params: {taskId: task.id }}">
                        <button class="btn btn-success">編集</button>
                    </router-link>
                    <button class="btn btn-danger" v-on:click="deleteTask(task.id)">削除</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                tasks: [],
                ratios: [0,10,20,30,40,50,60,70,80,90,100]
            }
        },
        methods: {
            getTasks() {
                axios.get('/api/tasks')
                    .then((res) => {
                        this.tasks = res.data;
                    });
            },
            deleteTask(id) {
                axios.delete('/api/tasks/' + id)
                    .then((res) => {
                        this.getTasks();
                    });
            },
            changeRatio(task) {
                axios.put('/api/tasks/' + task.id, task);
            }
        },
        mounted() {
            this.getTasks();
        }
    }
</script>
