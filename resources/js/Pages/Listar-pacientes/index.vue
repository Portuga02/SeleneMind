<template>
  <div>
    <h1 class="text-xl font-bold mb-4">Pacientes</h1>
    <Link href="/pacientes/create" class="bg-blue-500 text-white px-4 py-2 rounded">+ Novo Paciente</Link>

    <table class="mt-4 w-full border">
      <thead>
        <tr>
          <th class="p-2 border">Nome</th>
          <th class="p-2 border">Telefone</th>
          <th class="p-2 border">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="p in pacientes" :key="p.id">
          <td class="p-2 border">{{ p.nome }}</td>
          <td class="p-2 border">{{ p.telefone }}</td>
          <td class="p-2 border">
            <!-- Botões de ações futuras: visualizar, editar -->
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
defineProps({ pacientes: Array });
import { Link } from '@inertiajs/vue3';
</script>
