<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-sm-8">
                <div class="card-header">新規タスク追加</div>

                <div class="card-body">
                    <div v-if="errors.length" class="alert alert-danger" role="alert">
                        <ul>
                        <li v-for="error in errors">{{ error }}</li>
                        </ul>
                    </div>
                    <form v-on:submit.prevent="checkForm">
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">タスク</label>
                            <input type="text" class="col-sm-9 form-control" id="title" v-model="task.title">
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-3 col-form-label">内容</label>
                            <input type="text" class="col-sm-9 form-control" id="content" v-model="task.content">
                        </div>
                        <div class="form-group row">
                            <label for="person-in-charge" class="col-sm-3 col-form-label">担当者</label>
                            <input type="text" class="col-sm-9 form-control" id="person-in-charge" v-model="task.person_in_charge">
                        </div>
                        <button type="submit" class="btn btn-primary">新規登録</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            task: {},
            errors: []
        }
    },
    methods: {
        checkForm: function (e) {
            this.errors = [];

            if (!this.task.title) this.errors.push('タスク名を入力してください。');
            if (!this.task.content) this.errors.push('内容を入力してください。');
            if (!this.task.person_in_charge) this.errors.push('担当者を入力してください。');

            if (!this.errors.length){
                this.submit();
            }

            e.preventDefault();
        },

        submit() {
            axios.post('/api/tasks', this.task)
                .then((res) => {
                    this.$router.push({name: 'task.list'});
                });
        }
    }
}
</script>