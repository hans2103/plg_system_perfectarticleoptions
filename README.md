# plg_system_perfectarticleoptions


## installation
- install this plugin as a normal Joomla! plugin

## implementation
- create an override of blog.php to your template
- add code below to use the article class suffix field

```
<?php
    $attribs = json_decode($item->attribs);
    $articleclasssfx = '';
    if(isset($attribs->articleclass_{{[[-sfx-]]}}) && !empty($attribs->articleclass_{{[[-sfx-]]}}))
    {
      $articleclasssfx = $this->escape($attribs->articleclass_{{[[-sfx-]]}});
    }
?>
```

```
<div class="item column-<?php echo $rowcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?><?php echo $articleclasssfx;?>">
```
