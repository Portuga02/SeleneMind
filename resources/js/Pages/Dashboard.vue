<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

// Componentes das telas
import Pacientes from '@/Pages/Pacientes/index.vue'
import ListarPacientes from '@/Pages/Listar-pacientes/index.vue'
import Declaracoes from '@/Pages/Declaracoes/Index.vue'
import TeleAtendimento from '@/Pages/TeleAtendimento/Index.vue'
import Agenda from '@/Pages/Agenda/Index.vue'
import Financeiro from '@/Pages/Financeiro/Index.vue'
import SobreMim from '@/Pages/SobreMim/Index.vue'
import Contatos from '@/Pages/Contatos/Index.vue'

// Estado da tela atual
const telaAtual = ref(null)

function mostrar(tela) {
  telaAtual.value = tela
}
</script>

<template>
  <AppLayout title="Dashboard">
    <!-- Menu -->
    <nav class="bg-gray-800 p-4 flex space-x-4">
      <button @click="telaAtual = null" class="text-white">Home</button>
      <button @click="mostrar('cadastrar')" class="text-white">Cadastrar Pacientes</button>
      <button @click="mostrar('listar')" class="text-white">Listar Pacientes</button>
      <button @click="mostrar('declaracoes')" class="text-white">Declarações</button>
      <button @click="mostrar('tele')" class="text-white">Teleatendimento</button>
      <button @click="mostrar('agenda')" class="text-white">Agenda</button>
      <button @click="mostrar('financeiro')" class="text-white">Financeiro</button>
      <button @click="mostrar('sobre')" class="text-white">Sobre Mim</button>
      <button @click="mostrar('contatos')" class="text-white">Contatos</button>
    </nav>

    <!-- Conteúdo -->
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
          <!-- Troca os componentes dinamicamente -->
          <Pacientes v-if="telaAtual === 'cadastrar'" />
          <ListarPacientes v-else-if="telaAtual === 'listar'" />
          <Declaracoes v-else-if="telaAtual === 'declaracoes'" />
          <TeleAtendimento v-else-if="telaAtual === 'tele'" />
          <Agenda v-else-if="telaAtual === 'agenda'" />
          <Financeiro v-else-if="telaAtual === 'financeiro'" />
          <SobreMim v-else-if="telaAtual === 'sobre'" />
          <Contatos v-else-if="telaAtual === 'contatos'" />

          <!-- Conteúdo padrão (Home) -->
          <div v-else class="text-center text-gray-500 text-lg">
            Bem-vindo(a) à dashboard! Selecione uma opção no menu.
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
