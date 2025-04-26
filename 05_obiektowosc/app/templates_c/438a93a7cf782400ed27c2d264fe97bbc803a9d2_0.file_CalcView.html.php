<?php
/* Smarty version 5.4.2, created on 2025-04-26 20:11:13
  from 'file:C:\Users\Marlena\Desktop\specjalizacja\htdocs\PBAW-PAW2025\05_obiektowosc/app/CalcView.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_680d21c17672b5_47461897',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '438a93a7cf782400ed27c2d264fe97bbc803a9d2' => 
    array (
      0 => 'C:\\Users\\Marlena\\Desktop\\specjalizacja\\htdocs\\PBAW-PAW2025\\05_obiektowosc/app/CalcView.html',
      1 => 1745691068,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_680d21c17672b5_47461897 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\Marlena\\Desktop\\specjalizacja\\htdocs\\PBAW-PAW2025\\05_obiektowosc\\app';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_601303936680d21c17206e9_43017092', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1893226307680d21c172a199_43663705', 'content');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../templates/main.html", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_601303936680d21c17206e9_43017092 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\Marlena\\Desktop\\specjalizacja\\htdocs\\PBAW-PAW2025\\05_obiektowosc\\app';
?>
Marlena Gęborska <p> Uniwersytet Śląski w Katowicach</p><?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1893226307680d21c172a199_43663705 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\Marlena\\Desktop\\specjalizacja\\htdocs\\PBAW-PAW2025\\05_obiektowosc\\app';
?>


<h3 class="content-head is-center">Kalkulator kredytowy</h3>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/app/calc.php" method="post">
<fieldset>
        <label for="id_kwota">Kwota kredytu </label>
        <input id="id_kwota" type="text" name="kwota" value="<?php echo $_smarty_tpl->getValue('form')->kwota;?>
"/><br />

<label for="id_czas">Liczba lat </label>
<input id="id_czas" type="text" name="czas" value="<?php echo $_smarty_tpl->getValue('form')->czas;?>
" /><br />

<label for="id_oprocentowanie">Oprocentowanie roczne % </label>
<input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php echo $_smarty_tpl->getValue('form')->oprocentowanie;?>
" /><br />
<button type="submit" class="pure-button">Oblicz ratę kredytu</button>
        </fieldset>
            
</form>
</div>

<div class="l-box-lrg pure-u-1 pure-u-med-3-5">

		<?php if ($_smarty_tpl->getValue('msgs')->isError()) {?>
			<p class="emoji">&#128531</p>
			<h4>Wystąpiły błędy:</h4>
			<ol class="err">
				<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getErrors(), 'err');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('err')->value) {
$foreach0DoElse = false;
?>
					<li><?php echo $_smarty_tpl->getValue('err');?>
</li>
				<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
			</ol>
		<?php }?>

<?php if ((null !== ($_smarty_tpl->getValue('infos') ?? null))) {
if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('infos')) > 0) {?> 
<h4>Informacje: </h4>
<ol class="inf">
<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('infos'), 'msg');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach1DoElse = false;
?>
<li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
</ol>
<?php }
}?>

		<?php if ((null !== ($_smarty_tpl->getValue('res')->result ?? null))) {?>
			<div class="result">
				<h4>Miesięczna rata wynosi:</h4>
				<p class="res">
					<?php echo $_smarty_tpl->getValue('res')->result;?>
 zł
				</p>
			</div>
		<?php }?>

</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
