<template>
    <div class="panel-body">
        <table class="table" v-if="this.questions.length > 0">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Accept</th>
                    <th>Reject</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="question in this.questions">
                    <td class="col-10">{{ question.question }}</td>
                    <td class="text-center col-1">
                        <a class="accept-answer" href="#" @click="acceptAnswer(question.id)" title="Accept question">
                            <i class="fas fa-check-circle"></i>
                        </a>
                    </td>
                    <td class="text-center col-1">
                        <a class="reject-answer" href="#" @click="declineAnswer(question.id)" title="Reject question">
                            <i class="fas fa-times-circle"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div v-else>
            <p class="alert alert-warning text-center" role="alert">Questions list is empty.</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AdminQuestionList",
        props: ['questions', 'questionsAccepted'],
        methods: {
            acceptAnswer(questionId) {
                axios.post('/question/accept', {questionId: questionId}).then(response => {
                    this.$emit('acceptedquestion', {
                        user: this.user,
                        question: response.data.question
                    });

                    this.refreshQuestionsList(response.data.question);
                });
            },

            declineAnswer(questionId) {
                axios.post('/question/delete', {questionId: questionId}).then(response => {

                    this.refreshQuestionsList(response.data.question);
                });
            },

            refreshQuestionsList(question) {
                let i = this.questions.map(item => item.id).indexOf(question.id);
                this.questions.splice(i, 1);
            }
        }
    }
</script>

<style scoped>

</style>
