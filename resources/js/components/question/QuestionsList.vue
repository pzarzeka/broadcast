<template>
    <ul class="chat">
        <li class="left clearfix" v-for="question in questions">
            <div class="questions-list-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{ question.user.name }}
                    </strong>
                </div>
                <p>
                    {{ question.question }}
                </p>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        name: "QuestionsList",
        props: ['questions']
    }
</script>

<style scoped>

</style>
