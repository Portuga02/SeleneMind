<template>
  <div class="p-4">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Lista de Pacientes</h1>

    <div class="overflow-x-auto">
      <table
        class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded shadow text-sm">
        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
          <tr>
            <th class="p-2 border">Nome</th>
            <th class="p-2 border">Nascimento</th>
            <th class="p-2 border">Gênero</th>
            <th class="p-2 border">Estado Civil</th>
            <th class="p-2 border">Filhos</th>
            <th class="p-2 border">Email</th>
            <th class="p-2 border">Telefone</th>
            <th class="p-2 border">Emergência</th>
            <th class="p-2 border">Plano</th>
            <th class="p-2 border">Atendimento</th>
            <th class="p-2 border">Observações</th>
            <th class="p-2 border text-center">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="p in pacientes" :key="p.id" class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
            {{ p }}
            <td class="p-2 border">{{ p.nome }}</td>
            <td class="p-2 border">{{ p.data_nascimento }}</td>
            <td class="p-2 border">{{ p.genero }}</td>
            <td class="p-2 border">{{ p.estado_civil }}</td>
            <td class="p-2 border">
              {{ p.tem_filhos ? `${p.quantidade_filhos} filho(s)` : 'Não' }}
            </td>
            <td class="p-2 border">{{ p.email }}</td>
            <td class="p-2 border">{{ p.telefone }}</td>
            <td class="p-2 border">
              {{ p.contato_emergencial }} <br />
              {{ p.telefone_emergencial }}
            </td>
            <td class="p-2 border">
              {{ p.tem_plano_saude ? p.plano_saude : 'Não possui' }}
            </td>
            <td class="p-2 border">{{ p.forma_atendimento }}</td>
            <td class="p-2 border">{{ p.observacoes }}</td>
            <td class="p-2 border text-center space-x-2">
              <!-- Ações futuras -->
              <Link :href="`/pacientes/${p.id}/edit`" class="text-blue-600 dark:text-blue-400 hover:underline">Editar
              </Link>
              <Link :href="`/pacientes/${p.id}`" class="text-green-600 dark:text-green-400 hover:underline">Ver</Link>
            </td>
          </tr>

          <tr v-if="pacientes && pacientes.length === 0">
            <td colspan="12" class="p-4 text-center text-gray-500 dark:text-gray-400">
              Nenhum paciente encontrado.
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
defineProps({ pacientes: Array })
import { Link } from '@inertiajs/vue3'
</script>
