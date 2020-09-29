<template>
    <ul class="chat">
        <li class="left clearfix" v-for="question in this.questionsAccepted">
            <div class="question-list-body clearfix">
                <p>{{ question.question }}</p>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        name: "QuestionList",
        props: ['questionsAccepted']
    }
</script>

<style scoped>

</style>
