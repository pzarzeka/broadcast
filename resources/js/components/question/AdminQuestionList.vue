<template>
    <div class="panel-body">
        <ul class="list-group" v-for="question in questions">
            <div class="checkbox">
                <label>
                    {{ question.question }}
                </label>
            </div>
            <!--<div class="pull-right action-buttons">
                <a href="#"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="#" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                <a href="#" class="flag"><span class="glyphicon glyphicon-flag"></span></a>
            </div>-->
        </ul>
    </div>
</template>

<script>
    export default {
        name: "AdminQuestionList",
        props: ['questions']
    }
</script>

<style scoped>

</style>
