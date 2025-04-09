<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import NavLink from '@/Components/NavLink.vue'  // ✅ Importa NavLink
import Pacientes from '@/Pages/Pacientes/index.vue'
import { ref } from 'vue'

const mostrarPacientes = ref(false)

const abrirPacientes = () => {
  mostrarPacientes.value = true
}
</script>

<template>
  <AppLayout title="Dashboard">
    <nav class="bg-gray-800 p-4 flex space-x-4">
      <NavLink href="/" class="text-white">{{ 'Home' }}</NavLink>
      <NavLink href="/pacientes" class="text-white">{{ 'Cadastrar novos Pacientes' }}</NavLink>
      <NavLink href="/listar-pacientes" class="text-white">{{ "Cadastrar listar Pacientes" }}</NavLink>
      <NavLink href="/declaracoes" class="text-white">{{ 'Declarações' }}</NavLink>
      <NavLink href="/teleAtendimento" class="text-white">{{ 'Teleatendimento' }}</NavLink>
      <NavLink href="/Agenda" class="text-white">{{ "Agenda" }}</NavLink>
      <NavLink href="/financeiro" class="text-white">{{ 'Financeiro' }}</NavLink>
      <NavLink href="/sobre-mim" class="text-white">{{ 'Sobre-mim' }}</NavLink>
      <NavLink href="/contatos" class="text-white">{{ "Contatos" }}</NavLink>
    </nav>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
          <Pacientes v-if="mostrarPacientes" />
        </div>
      </div>
    </div>
  </AppLayout>
</template>
