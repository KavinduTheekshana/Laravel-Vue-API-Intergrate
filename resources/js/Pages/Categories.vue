<template>
    <Head title="Open APIs Dashboard" />
    <div class="max-w-7xl m-auto rounded-md shadow p-4 mt-5 border">
        <div class="flex justify-start items-center gap-5">
            <h1 class="text-2xl inline-block">list of Categories</h1>
        </div>
        <div class="mt-5">
            <ul style="row flex">
                <li
                    v-for="category in categories"
                    :key="category.id"
                    class="space-x-6"
                >
                    {{ category }}
                </li>
            </ul>
        </div>
    </div>

    <div class="max-w-7xl m-auto mt-[34px] mb-[34px] row space-x-4">
        <a
            href="/"
            type="button"
            class="border-spacing-8 border pl-10 pr-10 pt-5 pb-5 rounded"
            style="background-color: blue; color: white"
            >Get All Details</a
        >
    </div>
</template>

<script>
export default {
    props: {
        categories: {
            type: Array,
            required: true,
        },
    },
};
</script>
