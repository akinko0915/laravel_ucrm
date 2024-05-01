<script setup>
import {reactive} from 'vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    errors: Object,
})
 // reactiveによってinputの中身がリアルタイムに変わる
const form = reactive({
    title: null,
    content: null,
});


const submitFunction = () => {
    Inertia.post('/inertia', form)
    // 飛び先のURLと送る情報
}

</script>

<template>
    <form @submit.prevent="submitFunction">
        <input type="text" name="title" v-model="form.title"></input><br>
        <div v-if="errors.title">{{ errors.title }}</div>
        <input type="text" name="content" v-model="form.content"></input><br>
        <div v-if="errors.content">{{ errors.content }}</div>
        <button>submit</button>
    </form>
</template>


<!-- クライアントサイド（ブラウザ側）リアルタイムで検知できる、サーバーサイドのvalidationはLaravelが使える -->