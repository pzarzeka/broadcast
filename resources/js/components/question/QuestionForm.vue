<template>
    <div class="input-group">
        <input id="btn-input" type="text" name="question" class="form-control input-sm"
               placeholder="Type your question here..." v-model="newQuestion" @keyup.enter="sendQuestion">

        <span class="input-group-btn">
            <button class="btn btn-primary btn-sm" id="btn-form-question" @click="sendQuestion">
                Send
            </button>
        </span>
    </div>
</template>

<script>
    export default {
        name: "QuestionForm",

        data() {
            return {
                newQuestion: ''
            }
        },

        methods: {
            sendQuestion() {
                this.$emit('questionsent', {
                    user: this.user,
                    question: this.newQuestion
                });

                this.newQuestion = ''
            }
        }
    }
</script>

<style scoped>

</style>
