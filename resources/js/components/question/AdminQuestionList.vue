<template>
    <div class="panel-body">
        <ul class="list-group">
            <li v-for="question in questions">
                <label>
                    {{ question.question }}
                </label>
                <a href="#" @click="acceptAnswer(question.id)">Akceptuj</a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "AdminQuestionList",
        props: ['questions', 'questionsAccepted'],
        methods: {
            acceptAnswer(questionId) {
                axios.post('/question/accept', {questionId: questionId}).then(response => {
                    this.$emit('acceptedmessage', {
                        user: this.user,
                        question: response.question
                    });
                });
            }
        }
    }
</script>

<style scoped>

</style>
