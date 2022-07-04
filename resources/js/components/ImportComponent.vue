<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Кнопки импорта</div>

                    <div class="card-body">
                        <a class="btn btn-success" href="/import/subject_and_district" role="button">Субъект</a>
                        <a class="btn btn-warning" href="/import/subsoil_user" role="button">Недропользователь</a>
                        <!-- <a class="btn btn-primary" href="/import/licence_area" role="button">Лицензионные участки</a> -->
                        <a class="btn btn-danger" href="/import/licence" role="button">Лицензия</a>
                        <a class="btn btn-info" href="/import/field" role="button">Месторождение</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
