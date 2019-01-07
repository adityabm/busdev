<template>
    <div class="modal fade" role="dialog" id="modal-form-project" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Project</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Project Name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="project_name" v-model="item.project_name" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Description</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea class="form-control" v-model="item.description"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Target Funds</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="number" name="target" v-model="item.target" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Project Start</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input id="this-is-start-date" type="text" v-model="item.timeline_start" v-pikaday class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Project End</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input id="this-is-end-date" type="text" v-model="item.timeline_end" v-pikaday class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Profit Sharing Percentage</label>
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
                                <label for="text-input" class=" form-control-label">Project Image</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <vue-dropzone id="image" :options="dropzoneOptions"></vue-dropzone>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Project Documents</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <vue-dropzone id="doc" :options="dropzoneOptions2"></vue-dropzone>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" @click="save()">Confirm</button>
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
                    project_name: '',
                    description: '',
                    target:0,
                    timeline_start:'',
                    timeline_end:'',
                    percentage:0,
                    tags:''
                },
                base_url: base_url,
                dropzoneOptions: {
                    url: 'https://httpbin.org/post',
                    maxFilesize: 2,
                    thumbnailWidth: 200,
                    addRemoveLinks: true,
                  },
                dropzoneOptions2: {
                    url: 'https://httpbin.org/post',
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
                    $('#modal-form-project').modal("show");
                }
            },
            save(){
                if(this.item.project_name == ''){
                    $.alert('Project Name Is Required');
                    return;
                }

                if(this.item.target == 0){
                    $.alert('Target Funds must be greater than 0');
                    return;
                }

                if(this.item.timeline_start == ''){
                    $.alert('Project Start Is Required');
                    return;
                }

                if(this.item.timeline_end == ''){
                    $.alert('Project End Is Required');
                    return;
                }

                if(this.item.timeline_start > this.item.timeline_end){
                    $.alert('Project Start and Project End Format Is Invalid');
                    return;
                }

                if(this.item.percentage == 0){
                    $.alert('Profit Share Percentage must be greater than 0');
                    return;
                }

                if(this.item.tags == ''){
                    $.alert('Project must have atleast one tags');
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
                    tags:this.item.tags
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
                    $('#modal-form-project').modal("hide");
                  }
                },(response) => {
                  $.confirm({
                      title: 'Error!',
                      content: 'Something Trouble With Server. Please Contact Admin.',
                      type: 'red',
                      typeAnimated: true,
                      buttons: {
                          close: function () {
                          }
                      }
                  });
                })
            }
        },
        mounted() {
            this.$nextTick(function () {
                eventHub.$on('open-modal', this.open);
            }.bind(this));
        }
    }
</script>
