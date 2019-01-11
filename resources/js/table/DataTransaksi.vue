<template>
  <tr>
    <td v-text="(pagination.page - 1) * pagination.perpage + 1 + index"></td>
    <td>{{item.created_at | fullDate}}</td>
    <td>{{item.project.project_name}}</td>
    <td>{{item.invest | formatCurrency}}</td>
    <td>{{item.status}}</td>
  </tr>
</template>
<script>
export default {
  props: ['item','pagination','rowparams','index'],
  data() {
    return {
      base_url: base_url
    }
  },
  methods: {
  }
}
</script>
