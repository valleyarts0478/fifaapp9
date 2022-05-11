<template>
        <div class="row justify-content-center">
            <ul>
            <li v-for="team_list1 in $team_lists1" :key="team_list1.team_name">{{team_list1.team_name}}</li>
            </ul>
        </div>
</template>
 
<script>
    export default {
        props:["team_list1"]
    }
</script>