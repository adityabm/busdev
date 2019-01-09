<template>
    <div class="modal fade" role="dialog" id="modal-form-project" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Projek</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nama Projek*</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="project_name" v-model="item.project_name" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Deskripsi*</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea class="form-control" v-model="item.description"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Target Dana*</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="number" name="target" v-model="item.target" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Projek Mulai*</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input id="this-is-start-date" type="text" v-model="item.timeline_start" v-pikaday class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Projek Selesai*</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input id="this-is-end-date" type="text" v-model="item.timeline_end" v-pikaday class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Persentase Bagi Hasil*</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="number" min="1" max="100" name="percentage" v-model="item.percentage" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tags</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="tags" v-model="item.tags" class="form-control">
                                <small class="form-text text-muted">Use "," (comma) to seperate the tags</small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Foto Projek*</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <vue-dropzone id="image" ref="imageUploader" :options="dropzoneOptions" v-on:vdropzone-success="successImage"></vue-dropzone>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Dokumen Pendukung</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <vue-dropzone id="doc" ref="docUploader" :options="dropzoneOptions2" v-on:vdropzone-success="successDocs"></vue-dropzone>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="button" class="btn btn-primary" @click="save()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import V_Pikaday from 'vue-pikaday-directive';

    export default {
        props: [],
        data() {
            return {
                item: {
                    id: null,
                    project_name: '',
                    description: '',
                    target:0,
                    timeline_start:'',
                    timeline_end:'',
                    percentage:0,
                    tags:'',
                    image:[],
                    docs:[]
                },
                base_url: base_url,
                dropzoneOptions: {
                    url: base_url + '/dashboard/project/upload-image',
                    headers: {
                        "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
                    },
                    maxFilesize: 2,
                    thumbnailWidth: 200,
                    addRemoveLinks: true,
                    customOptionsObject:{
                        capture : 'image/'
                    }
                  },
                dropzoneOptions2: {
                    url: base_url + '/dashboard/project/upload-file',
                    headers: {
                        "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
                    },
                    maxFilesize: 2,
                    thumbnailWidth: 200,
                    addRemoveLinks: true,
                  },
            }
        },
        directives: {
            'pikaday': V_Pikaday
        },
        methods: {
            open(oid, item) {
                if (oid == 'form-project') {
                    if(item != null){
                        this.item = item;
                    }
                    this.$refs.imageUploader.removeAllFiles( true );
                    this.$refs.docUploader.removeAllFiles( true );
                    $('#modal-form-project').modal("show");
                }
            },
            successImage(file,response){
                this.item.image.push(response.name);
            },
            successDocs(file,response){
                this.item.docs.push(response.name);
            },
            save(){
                if(this.item.project_name == ''){
                    $.alert('Nama Projek harus diisi');
                    return;
                }

                if(this.item.target == 0){
                    $.alert('Target Dana harus lebih dari 0 rupiah');
                    return;
                }

                if(this.item.timeline_start == ''){
                    $.alert('Projek Mulai harus diisi');
                    return;
                }

                if(this.item.timeline_end == ''){
                    $.alert('Projek Selesai harus diisi');
                    return;
                }

                if(this.item.timeline_start > this.item.timeline_end){
                    $.alert('Format Tanggal yang dimasukkan salah');
                    return;
                }

                if(this.item.percentage == 0){
                    $.alert('Persentase Bagi Hasil harus lebih dari 0');
                    return;
                }

                if(this.item.percentage > 100){
                    $.alert('Persentase Bagi Hasil harus kurang dari 100');
                    return;
                }

                if(this.item.image.length == 0){
                    $.alert('Projek harus memiliki minimal 1 (satu) foto');
                    return;
                }

                var that = this;
                this.$http.post(base_url + '/dashboard/project/proses', {
                    _token: this.$root.csrf_token,
                    project_name:this.item.project_name,
                    description:this.item.description,
                    target:this.item.target,
                    timeline_start:this.item.timeline_start,
                    timeline_end:this.item.timeline_end,
                    percentage:this.item.percentage,
                    tags:this.item.tags,
                    image:this.item.image,
                    docs:this.item.docs
                }).then((response) => {
                  var data = response.data;
                  if (data.success) {
                    $.confirm({
                        title: 'Berhasil',
                        content: 'Mengupdate Data...',
                        type: 'green',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                            }
                        }
                    });
                    eventHub.$emit('refresh-ajaxtable', 'data-project');
                    $('#modal-form-project').modal("hide");
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
            },
        },
        mounted() {
            this.$nextTick(function () {
                eventHub.$on('open-modal', this.open);
            }.bind(this));
        }
    }
</script>
