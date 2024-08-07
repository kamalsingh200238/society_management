<script setup>
import { Head, Link } from "@inertiajs/vue3";
defineProps({
    societies: Object,
});
</script>
<template>

    <Head title="Coordinator Dashboard"></Head>

    <div>Coordinator Dashboard</div>
    <table>
        <thead>
            <tr>
                <th>Society Name</th>
                <th>Status</th>
                <th>President Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="society in $page.props.societies.data">
                <td class="px-5 py-2">{{ society.name }}</td>
                <td class="px-5 py-2">{{ society.isActive }}</td>
                <td class="px-5 py-2">{{ society.president.name }}</td>
                <td class="px-5 py-2">
                    <Link :href="route(
                        'coordinator.update.society.status',
                        society.id,
                    )
                        " as="button" method="patch" :data="{ isActive: !society.isActive }">
                    {{ !society.isActive ? "Enable" : "Disable" }}
                    </Link>
                </td>
            </tr>
        </tbody>
    </table>
</template>
