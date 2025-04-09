<template>
  <div class="max-w-2xl mx-auto p-4 bg-white shadow-md rounded">
    <h2 class="text-2xl font-semibold mb-4">{{'Cadastro de Paciente'}}</h2>

    <form @submit.prevent="submit">
      <div class="mb-4">
        <label class="block text-gray-700">Nome Completo:</label>
        <input v-model="form.nome" type="text" required class="border p-2 w-full">
      </div>

      <div class="mb-4">
        <label class="block text-gray-700">Data de Nascimento:</label>
        <input v-model="form.data_nascimento" type="date" required class="border p-2 w-full">
      </div>

      <div class="mb-4">
        <label class="block text-gray-700">Gênero:</label>
        <select v-model="form.genero" class="border p-2 w-full">
          <option value="Masculino">Masculino</option>
          <option value="Feminino">Feminino</option>
          <option value="Não-binário">Não-binário</option>
          <option value="Outro">Outro</option>
        </select>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700">Estado Civil:</label>
        <select v-model="form.estado_civil" class="border p-2 w-full">
          <option value="Solteiro(a)">Solteiro(a)</option>
          <option value="Casado(a)">Casado(a)</option>
          <option value="Divorciado(a)">Divorciado(a)</option>
          <option value="Viúvo(a)">Viúvo(a)</option>
          <option value="Outro">Outro</option>
        </select>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700">Tem filhos?</label>
        <input v-model="form.tem_filhos" type="checkbox">
      </div>

      <div v-if="form.tem_filhos" class="mb-4">
        <label class="block text-gray-700">Quantidade de filhos:</label>
        <input v-model="form.quantidade_filhos" type="number" min="1" class="border p-2 w-full">
      </div>

      <div class="mb-4">
        <label class="block text-gray-700">Telefone:</label>
        <input v-model="form.telefone" type="tel" class="border p-2 w-full">
      </div>

      <div class="mb-4">
        <label class="block text-gray-700">E-mail:</label>
        <input v-model="form.email" type="email" class="border p-2 w-full">
      </div>

      <div class="mb-4">
        <label class="block text-gray-700">Contato de Emergência:</label>
        <input v-model="form.contato_emergencia" type="text" class="border p-2 w-full">
      </div>

      <div class="mb-4">
        <label class="block text-gray-700">Telefone de Emergência:</label>
        <input v-model="form.telefone_emergencia" type="tel" class="border p-2 w-full">
      </div>

      <div class="mb-4">
        <label class="block text-gray-700">Plano de Saúde?</label>
        <input v-model="form.tem_plano_saude" type="checkbox">
      </div>

      <div v-if="form.tem_plano_saude" class="mb-4">
        <label class="block text-gray-700">Nome do Plano de Saúde:</label>
        <input v-model="form.plano_saude" type="text" class="border p-2 w-full">
      </div>

      <div class="mb-4">
        <label class="block text-gray-700">Forma de Atendimento:</label>
        <select v-model="form.forma_atendimento" class="border p-2 w-full">
          <option value="Presencial">Presencial</option>
          <option value="Online">Online</option>
        </select>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700">Observações:</label>
        <textarea v-model="form.observacoes" class="border p-2 w-full" rows="3"></textarea>
      </div>

      <button type="submit" class="bg-blue-500 text-white p-2 mt-4">Cadastrar</button>
    </form>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3'

export default {
  setup() {
    const form = useForm({
      nome: '',
      data_nascimento: '',
      genero: '',
      estado_civil: '',
      tem_filhos: false,
      quantidade_filhos: null,
      telefone: '',
      email: '',
      contato_emergencia: '',
      telefone_emergencia: '',
      tem_plano_saude: false,
      plano_saude: '',
      forma_atendimento: '',
      observacoes: '',
    })

    const submit = () => {
      form.post(route('pacientes.store'), {  // Nome correto da rota
        onSuccess: () => {
          alert('Paciente cadastrado com sucesso!')
        },
        onError: (errors) => {
          console.error('Erro no envio:', errors)
          alert('Ocorreu um erro ao cadastrar o paciente.')
        }
      })
    }



    return { form, submit }
  }
}
</script>