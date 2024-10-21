<script>
    export default {
        name:  'CountriesForm'

    }
</script>
<script setup>
import InputError from '../InputError.vue';
import FormSection from '../FormSection.vue';
import InputLabel from '../InputLabel.vue';
import PrimaryButton from '../PrimaryButton.vue';
import TextInput from '../TextInput.vue';

defineProps({
    form:{
        type: Object,
        required: true
    },
    updating:{
        type: Boolean,
        required: true,
        default: false
    }
})

defineEmits(['submit'])

</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Actualizar Pais' : 'Crear Nuevo Pais'}}
        </template>

        <template #description>
            {{ updating ? 'Actualizar El Pais Seleccionado' : 'Crear Nuevo Pais desde  cero' }}

        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="name" value="Name" />
                <TextInput id="name" v-model="form.name" type="text" autocomplete="name" class="mt-1 block w-full"/>
                <InputError :message="$page.props.errors.name" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Actualizar' : 'Crear' }}
            </PrimaryButton>
        </template>
    </FormSection>

</template>