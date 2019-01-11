<template>
  <tr>
    <td v-text="(pagination.page - 1) * pagination.perpage + 1 + index"></td>
    <td>{{item.project_name}}</td>
    <td>{{item.status}}</td>
    <td>{{item.target | formatCurrency}}</td>
    <td v-if="item.role == 'admin'">{{item.user ? item.user.name : ''}}</td>
    <td>{{item.timeline_start | fullDate}} - {{item.timeline_end | fullDate}}</td>
    <td>
      <template v-if="item.role != 'admin'">
        <a v-bind:href="base_url + '/project/' + item.slug" target="_blank"><span class="fa fa-search"></span></a>
        <a href="#" @click="edit(item)"><span class="fa fa-edit"></span></a>
        <a href="#"><span class="fa fa-trash"></span></a>
      </template>
      <template v-else>
        <a href="#" @click="approve(item)" v-if="item.status == 'submitted'"><span class="fa fa-check"></span></a>
        <a href="#" @click="reject(item)" v-if="item.status == 'submitted'"><span class="fa fa-times"></span></a>
      </template>
    </td>
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
    approve(item){
      var that = this;

      $.confirm({
          title: 'Apakah Anda Yakin?',
          content: 'Projek yang sudah diterima akan muncul pada halaman depan',
          typeAnimated: true,
          buttons: {
              no: function () {
              },
              yes: function () {
                that.$http.post(base_url + '/dashboard/project/approve', {
                    _token: that.$root.csrf_token,
                    id:item.id
                }).then((response) => {
                  var data = response.data;
                  if (data.success) {
                    $.confirm({
                        title: 'Success',
                        content: 'Updating Data',
                        type: 'green',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                            }
                        }
                    });
                    eventHub.$emit('refresh-ajaxtable', 'data-project');
                  }
                },(response) => {
                  $.confirm({
                      title: 'Gagal!',
                      content: 'Ada yang salah pada server. Mohon Hubungi Admin',
                      type: 'red',
                      typeAnimated: true,
                      buttons: {
                          close: function () {
                          }
                      }
                  });
                })
              }
          }
      });
    },
    reject(item){
      var that = this;

      $.confirm({
          title: 'Apakah Anda Yakin?',
          content: 'Projek yang sudah ditolak tidak bisa diubah lagi statusnya setelah ini.',
          typeAnimated: true,
          buttons: {
              no: function () {
              },
              yes: function () {
                that.$http.post(base_url + '/dashboard/project/reject', {
                    _token: that.$root.csrf_token,
                    id:item.id
                }).then((response) => {
                  var data = response.data;
                  if (data.success) {
                    $.confirm({
                        title: 'Success',
                        content: 'Updating Data',
                        type: 'green',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                            }
                        }
                    });
                    eventHub.$emit('refresh-ajaxtable', 'data-project');
                  }else{
                    $.confirm({
                        title: 'Failed',
                        content: data.message,
                        type: 'red',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                            }
                        }
                    });
                  }
                },(response) => {
                  $.confirm({
                      title: 'Gagal!',
                      content: 'Ada yang salah pada server. Mohon Hubungi Admin',
                      type: 'red',
                      typeAnimated: true,
                      buttons: {
                          close: function () {
                          }
                      }
                  });
                })
              }
          }
      });
    },
    edit(item){
      window.eventHub.$emit('open-modal', 'form-project',item);
    }
  }
}
</script>
