var plugins = {
  bower: [
    {
      in: 'AdminLTE/dist',
      out: 'adminlte'
    },
    {
      in: 'bootstrap/dist',
      out: 'bootstrap'
    },
    {
      in: 'jquery/dist',
      out: 'jquery'
    },
    {
      in: 'components-font-awesome/css',
      out: 'font-awesome/css'
    },
    {
      in: 'components-font-awesome/fonts',
      out: 'font-awesome/fonts'
    },
    {
      in: 'openSans',
      out: 'opensans'
    },
    {
      in: 'datatables.net/js',
      out: 'datatables/js'
    },
    {
      in: 'datatables.net-bs/css',
      out: 'datatables-bs/css'
    },
    {
      in: 'datatables.net-bs/js',
      out: 'datatables-bs/js'
    },
    {
      in: 'jasny-bootstrap/dist',
      out: 'jasny-bootstrap'
    },
    {
      in: 'jqTree/tree.jquery.js',
      out: 'jqtree/js'
    },
    {
      in: 'jqTree/jqtree.css',
      out: 'jqtree/css'
    },
    {
      in: 'summernote/dist/summernote.min.js',
      out: 'summernote/js'
    },
    {
      in: 'summernote/dist/summernote.css',
      out: 'summernote/css'
    },
    {
      in: 'summernote/dist/font',
      out: 'summernote/css/font'
    },
    {
      in: 'magnific-popup/dist',
      out: 'magnific-popup'
    },
    {
      in: 'select2/dist/js/select2.min.js',
      out: 'select2/js/select2.min.js'
    },
    {
      in: 'select2/dist/css/select2.min.css',
      out: 'select2/css/select2.min.css'
    },
    {
      in: 'toastr/toastr.min.js',
      out: 'toastr/toastr.min.js'
    },
    {
      in: 'toastr/toastr.min.css',
      out: 'toastr/toastr.min.css'
    },
    {
      in: 'bootstrap-colorpicker/dist',
      out: 'colorpicker'
    },
  ],
  vue: [
    {
      in: 'backend/dropzone.js',
      out: 'backend/dropzone.js'
    }
  ]
}
module.exports = plugins;
