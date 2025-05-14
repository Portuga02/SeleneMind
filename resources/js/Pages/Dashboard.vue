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
const menuAberto = ref(false)

function mostrar(tela) {
  telaAtual.value = tela
  menuAberto.value = false
}
</script>

<template>
  <AppLayout title="Dashboard">
    <!-- Menu Responsivo -->
    <nav class="bg-gray-800 p-4 sm:flex sm:items-center sm:justify-start">
      <!-- Botão para abrir menu no mobile -->
      <div class="flex justify-between items-center sm:hidden">
        <span class="text-white text-lg font-semibold">Menu</span>
        <button @click="menuAberto = !menuAberto" class="text-white focus:outline-none">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>

      <!-- Itens do menu -->
      <div :class="{ 'block': menuAberto, 'hidden': !menuAberto }" class="sm:flex sm:space-x-4 mt-4 sm:mt-0">
        <button @click="telaAtual = null" class="block text-white px-2 py-1">Home</button>
        <button @click="mostrar('cadastrar')" class="block text-white px-2 py-1">Cadastrar Pacientes</button>
        <button @click="mostrar('listar')" class="block text-white px-2 py-1">Listar Pacientes</button>
        <button @click="mostrar('declaracoes')" class="block text-white px-2 py-1">Declarações</button>
        <button @click="mostrar('tele')" class="block text-white px-2 py-1">Teleatendimento</button>
        <button @click="mostrar('agenda')" class="block text-white px-2 py-1">Agenda</button>
        <button @click="mostrar('financeiro')" class="block text-white px-2 py-1">Financeiro</button>
        <button @click="mostrar('sobre')" class="block text-white px-2 py-1">Sobre Mim</button>
        <button @click="mostrar('contatos')" class="block text-white px-2 py-1">Contatos</button>
      </div>
    </nav>

    <!-- Conteúdo -->
    <div class="py-6 px-4 sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg p-6">
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
        <div v-else class="text-center text-gray-500 dark:text-gray-300 text-lg">
          Bem-vindo(a) à dashboard! Selecione uma opção no menu.
        </div>
      </div>
    </div>
  </AppLayout>
</template>
