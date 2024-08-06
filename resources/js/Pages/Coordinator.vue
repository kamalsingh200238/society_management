<script setup>
const x = defineProps({
    societies: Object,
});

console.log(x.societies);
</script>
<template>
    <div>Hi Student</div>
    <div>{{ $page.props.auth.user }}</div>
    <div>{{ $page.props.societies }}</div>
    <table>
        <thead>
            <tr>
                <th>Society Name</th>
                <th>Status</th>
                <th>President Name</th>
                <th>President Email</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="society in $page.props.societies.data">
                <td class="px-5 py-2">{{ society.name }}</td>
                <td class="px-5 py-2">{{ society.isActive }}</td>
                <td class="px-5 py-2">{{ society.president.name }}</td>
                <td class="px-5 py-2">{{ society.president.email }}</td>
            </tr>
        </tbody>
    </table>
</template>
