<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-sm-8">
                <div class="card-header">タスク詳細</div>

                <div class="card-body">
                    <form>
                        <div class="form-group row border-bottom">
                            <label for="id" class="col-sm-3 col-form-label">ID</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id"
                                v-model="task.id">
                        </div>
                        <div class="form-group row border-bottom">
                            <label for="title" class="col-sm-3 col-form-label">タスク</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="title"
                                v-model="task.title">
                        </div>
                        <div class="form-group row border-bottom">
                            <label for="content" class="col-sm-3 col-form-label">内容</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="content"
                                v-model="task.content">
                        </div>
                        <div class="form-group row border-bottom">
                            <label for="person-in-charge" class="col-sm-3 col-form-label">担当者</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="person-in-charge"
                                v-model="task.person_in_charge">
                        </div>
                        <div class="form-group row border-bottom">
                            <label for="ratio" class="col-sm-3 col-form-label">進捗率</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="ratio"
                                v-model="task.ratio">
                        </div>
                        <div class="form-group row border-bottom">
                            <label for="created_at" class="col-sm-3 col-form-label">登録日時</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="created_at"
                                v-model="task.created_at">
                        </div>
                        <div class="form-group row border-bottom">
                            <label for="updated_at" class="col-sm-3 col-form-label">更新日時</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="updated_at"
                                v-model="task.updated_at">
                        </div>
                        <router-link v-bind:to="{name: 'task.edit', params: {taskId: task.id }}">
                            <button class="btn btn-success">編集</button>
                        </router-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            taskId: String
        },
        data: function () {
            return {
                task: {}
            }
        },
        methods: {
            getTask() {
                axios.get('/api/tasks/' + this.taskId)
                    .then((res) => {
                        this.task = res.data;
                    });
            }
        },
        mounted() {
            this.getTask();
        }
    }
</script>