<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if ((!$page && !empty($title)) || !empty($title_prefix) || !empty($title_suffix) || $display_submitted): ?>
  <header>
    <?php print render($title_prefix); ?>
    <?php if (!$page && !empty($title)): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php if ($display_submitted): ?>
    <span class="submitted">
      <?php print $user_picture; ?>
      <?php print $submitted; ?>
    </span>
    <?php endif; ?>
  </header>
  <?php endif; ?>
  <?php
    // Hide comments, tags, and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);
      ?>

<?php
if ($node = menu_get_object()) {
 $nid = $node->nid;
}
?>

<a href="/fillpdf?fid=2&nid=<?php print $nid ?>" class="btn btn-success btn-large"><i class="icon-white icon-file"></i> Download PDF</a>

<table width="100%" class="table table-striped table-bordered">
  <tbody>
    <tr>
      <td><?php print render($content['field_bol_number']); ?></td>
    </tr>
    <tr>
      <td><?php print render($content['field_date']); ?></td>
    </tr>
    <tr>
      <td><?php print render($content['field_po_number']); ?></td>
    </tr>
    <tr>
      <td><?php print render($content['field_lot_number']); ?></td>
    </tr>
    <tr>
      <td><?php print render($content['field_carrier_name']); ?></td>
    </tr>
    <tr>
      <td><?php print render($content['field_trailer_number']); ?></td>
    </tr>
    <tr>
      <td><?php print render($content['field_container_number']); ?></td>
    </tr>
    <tr>
      <td><?php print render($content['field_booking_number']); ?></td>
    </tr>
    <tr>
      <td><?php print render($content['field_seal_number']); ?></td>
    </tr>
    <tr>
      <td><?php print render($content['field_empty_weight']); ?></td>
    </tr>
    <tr>
      <td><?php print render($content['field_loaded_weight']); ?></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<table width="50%" class="table table-striped table-bordered">
  <tbody>
    <tr>
      <td colspan="2">Sold To:</td>
    </tr>
    <tr>
      <td><?php print render($content['field_consignee']); ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php print render($content['field_bill_to_address_1']); ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php print render($content['field_bill_to_state']); ?> <?php print render($content['field_ship_to_zip']); ?></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<table width="50%" class="table table-striped table-bordered">
  <tbody>
    <tr>
      <td colspan="2">Delivery Address (If Different)</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<table width="100%" class="table table-striped table-bordered">
  <tbody>
    <tr>
      <td width="10%">Units</td>
      <td width="60%">Description</td>
      <td width="10%">Gross</td>
      <td width="10%">Tare</td>
      <td width="10%">Net</td>
    </tr>
    <tr>
      <td width="10%"><?php print $node->field_units['und'][0]['value']; ?></td>
      <td width="60%"><?php print $node->field_description['und'][0]['value']; ?></td>
      <td width="10%"><?php print $node->field_gross['und'][0]['value']; ?></td>
      <td width="10%"><?php print $node->field_tare['und'][0]['value']; ?></td>
      <td width="10%">&nbsp;</td>
    </tr>
    <tr>
      <td width="10%"><?php print $node->field_units['und'][1]['value']; ?></td>
      <td width="60%"><?php print $node->field_description['und'][1]['value']; ?></td>
      <td width="10%"><?php print $node->field_gross['und'][1]['value']; ?></td>
      <td width="10%"><?php print $node->field_tare['und'][1]['value']; ?></td>
      <td width="10%">&nbsp;</td>
    </tr>
    <tr>
      <td width="10%"><?php print $node->field_units['und'][2]['value']; ?></td>
      <td width="60%"><?php print $node->field_description['und'][2]['value']; ?></td>
      <td width="10%"><?php print $node->field_gross['und'][2]['value']; ?></td>
      <td width="10%"><?php print $node->field_tare['und'][2]['value']; ?></td>
      <td width="10%">&nbsp;</td>
    </tr>
    <tr>
      <td width="10%"><?php print $node->field_units['und'][3]['value']; ?></td>
      <td width="60%"><?php print $node->field_description['und'][3]['value']; ?></td>
      <td width="10%"><?php print $node->field_gross['und'][3]['value']; ?></td>
      <td width="10%"><?php print $node->field_tare['und'][3]['value']; ?></td>
      <td width="10%">&nbsp;</td>
    </tr>
    <tr>
      <td width="10%"><?php print $node->field_units['und'][4]['value']; ?></td>
      <td width="60%"><?php print $node->field_description['und'][4]['value']; ?></td>
      <td width="10%"><?php print $node->field_gross['und'][4]['value']; ?></td>
      <td width="10%"><?php print $node->field_tare['und'][4]['value']; ?></td>
      <td width="10%">&nbsp;</td>
    </tr>
    <tr>
      <td width="10%"><?php print $node->field_units['und'][5]['value']; ?></td>
      <td width="60%"><?php print $node->field_description['und'][5]['value']; ?></td>
      <td width="10%"><?php print $node->field_gross['und'][5]['value']; ?></td>
      <td width="10%"><?php print $node->field_tare['und'][5]['value']; ?></td>
      <td width="10%">&nbsp;</td>
    </tr>
    <tr>
      <td width="10%"><?php print $node->field_units['und'][6]['value']; ?></td>
      <td width="60%"><?php print $node->field_description['und'][6]['value']; ?></td>
      <td width="10%"><?php print $node->field_gross['und'][6]['value']; ?></td>
      <td width="10%"><?php print $node->field_tare['und'][6]['value']; ?></td>
      <td width="10%">&nbsp;</td>
    </tr>
    <tr>
      <td width="10%"><?php print $node->field_units['und'][7]['value']; ?></td>
      <td width="60%"><?php print $node->field_description['und'][7]['value']; ?></td>
      <td width="10%"><?php print $node->field_gross['und'][7]['value']; ?></td>
      <td width="10%"><?php print $node->field_tare['und'][7]['value']; ?></td>
      <td width="10%">&nbsp;</td>
    </tr>
    <tr>
      <td width="10%"><?php print $node->field_units['und'][8]['value']; ?></td>
      <td width="60%"><?php print $node->field_description['und'][8]['value']; ?></td>
      <td width="10%"><?php print $node->field_gross['und'][8]['value']; ?></td>
      <td width="10%"><?php print $node->field_tare['und'][8]['value']; ?></td>
      <td width="10%">&nbsp;</td>
    </tr>
    <tr>
      <td width="10%"><?php print $node->field_units['und'][9]['value']; ?></td>
      <td width="60%">
      <?php
        if (isset($node->field_description['und'][9]['value'])) {
        print $node->field_description['und'][9]['value'];
      }
        ?></td>
      <td width="10%"><?php print $node->field_gross['und'][9]['value']; ?></td>
      <td width="10%"><?php print $node->field_tare['und'][9]['value']; ?></td>
      <td width="10%">&nbsp;</td>
    </tr>
  </tbody>
</table>
  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
  <footer>
    <?php print render($content['field_tags']); ?>
    <?php print render($content['links']); ?>
  </footer>
  <?php endif; ?>
  <?php print render($content['comments']); ?>
</article>