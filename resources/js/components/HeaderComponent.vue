<template>
    <div class="container-fluid bg-secondary mb-3" style="border-bottom:double #FFF 6px">
        <div class="container">
            <nav class="navbar navbar-dark">
                <router-link v-bind:to="{name: 'home'}">
                    <span class="navbar-brand mb-0 h1">タスク管理 SPA版</span>
                </router-link>
                <div>
                    <router-link v-bind:to="{name: 'task.list'}">
                        <button class="btn btn-light">タスク一覧</button>
                    </router-link>
                    <router-link v-bind:to="{name: 'task.create'}">
                        <button class="btn btn-primary">新規タスク追加</button>
                    </router-link>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {}
</script>
