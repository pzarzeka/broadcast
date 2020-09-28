/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import QuestionForm from './components/question/QuestionForm';
import QuestionsList from './components/question/QuestionsList';
import AdminQuestionList from './components/question/AdminQuestionList';

const app = new Vue({
    el: '#app',

    data: {
        questions: [],
        // questionsNew: [],
    },

    created() {
        this.fetchQuestions();

        Echo.private('question')
            .listen('NewQuestion', (e) => {
                this.questions.push({
                    question: e.question.question,
                    user: e.user
                });
            })
            /*.listen('AcceptedMessage', (e) => {
                this.questions.push({
                    question: e.question.question,
                });
            })*/
        ;
    },

    methods: {
        fetchQuestions() {
            axios.get('/question').then(response => {
                this.questions = response.data;
            });
        },

        addQuestion(question) {
            axios.post('/question/store', question).then(response => {});

            this.questions.push({
                question: question
            });
        }
    },

    components: {
        QuestionForm,
        QuestionsList,
        AdminQuestionList
    }

});
