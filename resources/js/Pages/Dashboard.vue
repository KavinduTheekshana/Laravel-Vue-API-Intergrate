<template>
    <Head title="Open APIs Dashboard" />

    <div class="max-w-7xl m-auto rounded-md shadow p-4 mt-5 border">
        <div class="flex justify-start items-center gap-5">
            <h1 class="text-2xl inline-block">Public APIs</h1>
            <span>A list of publically available, free to use APIs</span>
        </div>

        <div class="mt-5">
            <DataTable :data="dataSet" :columns="columns" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>API</th>
                        <th>Auth</th>
                        <th>HTTPS</th>
                        <th>Cors</th>
                        <th>Description</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <!-- <tbody>
                  <tr v-for="(dataSet, index) in this.dataSet" :key="index">
                    <td>{{ dataSet.Category }}</td>
                    <td>{{ dataSet.API }}</td>
                    <td>{{ dataSet.Auth }}</td>
                    <td>{{ dataSet.HTTPS }}</td>
                    <td>{{ dataSet.Cors }}</td>
                    <td>{{ dataSet.Description }}</td>
                    <td>{{ dataSet.Link }}</td>
                </tr>
                </tbody> -->
            </DataTable>
        </div>
    </div>

    <div class="max-w-7xl m-auto mt-[34px] mb-[34px] row space-x-4">
        <a
            href="categories"
            type="button"
            class="border-spacing-8 border pl-10 pr-10 pt-5 pb-5 rounded"
            style="background-color: blueviolet; color: white"
            >Get All Categories</a
        >
    </div>
</template>

<script>
import DataTable from "datatables.net-vue3";
import Select from "datatables.net-select";

DataTable.use(Select);

export default {
    components: { DataTable },

    data() {
        return {
            dataSet: null,
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return `${meta.row + 1}`;
                    },
                },
                { data: "Category" },
                { data: "API" },
                { data: "Auth" },
                { data: "HTTPS" },
                { data: "Cors" },
                { data: "Description" },
                { data: "Link" },
            ],
        };
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData() {
            fetch("https://api.publicapis.org/entries")
                .then((response) => response.json())
                .then((res) => {
                    this.dataSet = res.entries;
                    console.log(this.dataSet);
                });
        },
    },
};
</script>
