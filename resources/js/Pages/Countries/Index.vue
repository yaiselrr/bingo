<script>
export default {
    name: "CountriesIndex",
};
</script>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia"

defineProps({
    countries: {
        type: Object,
        required: true,
    },
});

const deleteCountry = (id) => {
    if (confirm("Está seguro que usted quiere eliminar el país ?")) {
        Inertia.delete(route("countries.destroy", id));
    }
};
</script>

<template>
    <AppLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Paises
            </h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div
                        class="flex justify-between"
                        v-if="
                            $page.props.users.permissions.includes(
                                'create country'
                            )
                        "
                    >
                        <Link
                            :href="route('countries.create')"
                            class="text-white bg-indigo-500 hover:bg-indigo-700 py-2 px-4 rounded font-semibold"
                        >
                            CREAR PAIS
                        </Link>
                    </div>

                    <div class="mt-4">
                        <ul role="list" class="divide-y divide-gray-100">
                            <li
                                class="flex justify-between gap-x-6 py-5"
                                v-for="(country, index) in countries.data"
                                :key="index"
                            >
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p
                                            class="text-md font-semibold leading-6 text-gray-900"
                                        >
                                            {{ country.name }}
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="hidden shrink-0 sm:flex sm:flex-col sm:items-end"
                                >
                                    <p class="text-md leading-6 text-gray-900">
                                        <Link
                                            class="py-2 px-4 m-1 hover:bg-yellow-500 rounded font-semibold"
                                            v-if="
                                                $page.props.users.permissions.includes(
                                                    'update country'
                                                )
                                            "
                                            :href="
                                                route(
                                                    'countries.edit',
                                                    country.id
                                                )
                                            "
                                            >Editar</Link
                                        >
                                        <Link
                                            class="py-2 px-4 hover:bg-gray-300 font-semibold text-red-700"
                                            v-if="
                                                $page.props.users.permissions.includes(
                                                    'delete country'
                                                )
                                            "
                                            @click="deleteCountry(country.id)"
                                            >Eliminar</Link
                                        >
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="flex justify-between mt-2">
                        <Link v-if="countries.current_page > 1" :href="countries.prev_page_url" class="py-2 px-4 rounded">
                            PREV
                        </Link>
                        <div v-else></div>

                        <Link v-if="countries.current_page < countries.last_page" :href="countries.next_page_url" class="py-2 px-4 rounded">
                            NEXT
                        </Link>
                        <div v-else></div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
