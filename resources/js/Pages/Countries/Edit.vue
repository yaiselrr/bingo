<script>
export default {
    name: "CountriesEdit",
};
</script>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";
import CountriesForm from "@/Components/Countries/Form.vue";

const props = defineProps({
    country: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    name: props.country.name,
});
</script>

<template>
    <AppLayout title="Editar Pais">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar Pais
            </h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div
                        class="bg-white overflow-hidden shadow-xl sm:rounded-lg"
                    >
                        <div class="p-6 bg-white border-b border-gray-200">
                            <CountriesForm
                                :updating="true"
                                :form="form"
                                @submit="form.put(route('countries.update', country.id))"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
