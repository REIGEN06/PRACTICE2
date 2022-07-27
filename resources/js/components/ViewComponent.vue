<template>
<div class="main">
    <h6 class="title is-4">Состояние лицензии -> Недропользователь -> Лицензия</h6>
    <table class="table table-hover table-striped">
        <tbody>
            <tr><td>Лицензионный участок</td><td>{{licenceCard.licence_area}}</td></tr>
            <tr><td>Дата первоначальной лицензии</td><td>{{licenceCard.initial_time}}</td></tr>
            <tr><td>Лицензия</td><td>{{licenceCard.series}}{{licenceCard.number}}{{licenceCard.view}} срок действия {{licenceCard.date_of_receiving}} — {{licenceCard.date_of_expiration}}</td></tr>
            <tr><td>Целевое назначение и вид работ</td><td>{{licenceCard.type_of_main_mineral}}</td></tr>
            <tr><td>Статус</td><td>{{licenceCard.licence_status}}</td></tr>
        </tbody>
    </table>
    <table class="table caption-top table-borderless">
        <caption><p class="text-primary">История лицензирования</p></caption>
        <thead class="table-secondary">
            <tr>
            <th scope="col">Недропользователь</th>
            <th scope="col">Номер</th>
            <th scope="col">Дата регистрации</th>
            <th scope="col">Срок действия</th>
            <th scope="col">Состояние</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{licenceCard.name}}</td>
                <td>{{licenceCard.licence_number}}</td>
                <td>{{licenceCard.date_of_receiving}}</td>
                <td>{{licenceCard.date_of_expiration}}</td>
                <td>{{licenceCard.condition}}</td>
            </tr>
        </tbody>
        <tbody v-for="licence in licenceCard.prev_licences" :key="licence.id">
            <tr>
            <td>{{licence.name}}</td>
            <td>{{licence.licence_number}}</td>
            <td>{{licence.date_of_receiving}}</td>
            <td>{{licence.date_of_annulment}}</td>
            <td>{{licence.condition}}</td>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script>
import {bus} from '../../main';
export default {
    data(){
        return{
            licenceCard: Object,
        }
    },
    created(){
        bus.$on('licenceCard', data => {
            this.licenceCard = data;
        })
    }
}
</script>

<style>
</style>