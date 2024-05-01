<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Label from '@/Components/InputLabel.vue';
import Input from '@/Components/TextInput.vue';

const emittTest = e => {
    console.log(e)
}

</script>

<template>
<GuestLayout>
    <Label value="件名">タイトル</Label>
    <Input 
    modelValue="初期値が入ります"
    @update:modelValue="emittTest"
    ></Input>
</GuestLayout>
</template>