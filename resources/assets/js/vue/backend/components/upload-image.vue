<template>
    <div id="dropzone" class="dropzone"></div>
</template>

<script>
	var Dropzone = require("dropzone");
    Dropzone.autoDiscover = false;
    var route = window.router || laroute || window.laroute;
    var token = $('meta[name="csrf-token"]').attr('content');
    export default {
    	data: function () {
    		return {
    			dz: {
                    on: function () {},
                    emit: function () {}
                }
    		}
    	},
    	props: {
            images: {
                type: Array,
                default: function () {
                    return []
                }
            },
            url: {
                type: String,
                default: function () {
                    return route.route('backend.image.store');
                }
            },
            method: {
                type: String,
                default: function () {
                    return 'POST';
                }
            }
        },
        methods: {
        	initDz: function () {
                var self = this;
                this.$set(
                    'dz',
                    new Dropzone("#dropzone", {
                        url: self.url,
                        paramName: 'src',
                        acceptedFiles: 'image/*',
                        addRemoveLinks: true,
                        dictRemoveFile: 'Xóa',
                        init: function () {
                            this.on('sending', self.dzOnSending)
                            this.on('error', self.dzOnError)
                            this.on('complete', self.dzOnComplete)
                            this.on('removedfile', self.dzOnFileRemoved)
                            this.on('success', self.dzOnSuccess)
                        }
                    })
                );
            },
            dzOnSending: function(file, xhr, formData) {
                var self = this;
                formData.append('_method', self.method);
                formData.append('_token', token);
            },
            dzOnError: function(file, response, xhr) {
                if (xhr && xhr.status == 422) {
                    // Validation
                }
                file.previewElement.classList.add("dz-error");
                var _ref = file.previewElement.querySelector("[data-dz-errormessage]");
            },
            dzOnComplete: function(file) {
                if (file._removeLink) {
                    if (file.data) {
                        var id = file.data.id;
                        file._removeLink.href = '#'+id
                    }
                    file._removeLink.textContent = this.dz.options.dictRemoveFile;
                }
                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-complete");
                }
            },
            dzOnFileRemoved: function (file) {
                return;
                /**
                 * Skip the deletion
                 */
                if (file.data) {
                    this.$http({
                        url: route.route('backend.image.destroy', {image: file.data.id}),
                        method: 'DELETE',
                        // data: {_method:'DELETE'}
                    }).then(function (response) {
                        console.log(response);
                    }, function (response) {
                    // error callback
                    });
                }
            },
            dzOnSuccess: function (file, data) {
                var input = document.createElement('input');
                input.setAttribute('type', 'hidden');
                input.setAttribute('name', 'image_id[]');
                input.setAttribute('value', data.id);
                file.data = data;
                file.previewElement.appendChild(input);
            },
            dzMockImage: function (mockFile, data) {
                this.dz.emit("addedfile", mockFile);
                this.dz.createThumbnailFromUrl(mockFile, mockFile.src);
                this.dz.emit("complete", mockFile);
                this.dz.emit("success", mockFile, data);
                data.file = mockFile;
                return data;
            },
            dzMockImages: function () {
                var images = this.images;
                var self = this;
                var promises = [];
                images.forEach(function(image) {
                    var promise = new Promise(function(resolve, reject) {
                        var file = { name: image.name, size: image.size, src: laroute.route('image',{path:image.image_thumbnail}) };
                        file.data = image;
                        resolve(self.dzMockImage(file, image));
                    });
                    promises.push(promise);
                });
                return Promise.all(promises);

            },
        },
        ready: function () {
            var self = this;
            this.initDz();
            this.dzMockImages();
        }
    }
</script>