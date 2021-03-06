<?php
  /*
    All Emoncms code is released under the GNU Affero General Public License.
    See COPYRIGHT.txt and LICENSE.txt.

    ---------------------------------------------------------------------
    Emoncms - open source energy visualisation
    Part of the OpenEnergyMonitor project:
    http://openenergymonitor.org
  */

  global $path;
?>

<script type="text/javascript" src="<?php print $path; ?>Lib/flot/jquery.min.js"></script>
<script type="text/javascript" src="<?php print $path; ?>Lib/listjs/list.js"></script>

<div style="float:right;"><a href="api"><?php echo _("Feed API Help");?></a></div>
<h2><?php echo _('Deleted Feeds'); ?></h2>

<div id="feedlist"></div>

<?php if ($feeds) { ?><br><a href="emptybin"><?php echo _('Delete feeds permanently'); ?></a> (no confirmation)<?php } ?>

<script type="text/javascript">

  // The list is created using list.js - a javascript dynamic user interface list creator created as part of this project
  // list.js is still in early development.

  var list =
  {
    'element': "feedlist",
 
    'items': <?php echo json_encode($feeds); ?>,

    'groupby': 'tag',

    'fields': 
    {
      'id':{}, 
      'name': {}, 
      'tag': {}, 
      'datatype':
      {
        'format':"select",
        'options':{0:"UNDEFINED", 1:"REALTIME", 2:"DAILY", 3:"HISTOGRAM"}
      }, 
    },

    'group_prefix': "",

    'path': "<?php echo $path; ?>",
    'controller': "feed",
    'listaction': "deleted",

    'editable': false,
    'deletable': false,
    'restoreable': true,

    'group_properties': {},

    'updaterate': 5000
  };

  listjs(list);

</script>
