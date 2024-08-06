<script setup>
import { Head, Link } from "@inertiajs/vue3";
</script>

<template>

    <Head title="Society Management" />
    <div>
        <div class="bg-rose-500">Home page</div>
        <Link v-if="
            $page.props.auth &&
            $page.props.auth.user?.role === 'coordinator'
        " :href="route('coordinator.dashboard')">
        Coordinator Dashboard
        </Link>
        <Link v-else-if="
            $page.props.auth &&
            ($page.props.auth.user?.role === 'society president' ||
                $page.props.auth.user?.role === 'student')
        " :href="route('student.dashboard')">
        Student Dashboard
        </Link>
        <Link v-if="!$page.props.auth.user" :href="route('login')">Login</Link>
        <Link v-if="$page.props.auth.user" :href="route('logout')" method="post">Logout</Link>
    </div>
</template>
