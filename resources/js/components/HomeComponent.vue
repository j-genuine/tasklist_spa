<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-header">タスク管理 SPA版について</div>

                    <div class="card-body">
                        Vue.js + Laravel API でテスト用に作成した、シングルページアプリケーションです。<br />
                        シンプルなToDoリストCRUDに、下記機能等を追加しています。
                        <ul>
                        <li>一覧ページでの進捗状況設定</li>
                        <li>vuejs-paginateを使ったページネーション</li>
                        </ul>
                        <p>
                        ※今のところユーザ認証等の連携は行っていません。<br />
                        ※データ取得に遅延が発生し、表示に時間がかかる事があります。
                        </p>
                        <hr />
                        <router-link v-bind:to="{name: 'task.list'}">
                            <button class="btn btn-link">タスク一覧を表示</button>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
}
</script>