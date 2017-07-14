			</div><!-- container -->
		</section><!-- ad-profile-page -->

<!-- footer -->
<footer id="footer" class="clearfix"></footer>
<!-- footer -->


<!--/ START MODAL NEWSLETTER -->
	<div id="modal_atualizar_perfil">
		<?php if($this->session->flashdata('atualizar-perfil')){ ?>
			<p class="text-success"><?= $this->session->flashdata('atualizar-perfil') ?></p>
		<?php } ?>
	</div>
<!--/ END MODAL NEWSLETTER -->


<!-- JS -->
<script charset="utf-8"	src="<?= base_url('node_modules/izimodal/js/iziModal.min.js') ?>" ></script>
<script charset="utf-8" src="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script charset="utf-8" src="<?= base_url() ?>public/js/main.js"></script>
<script charset="utf-8" src="<?= base_url() ?>public/js/index.js"\></script>
<script charset="utf-8" src="<?= base_url('node_modules/jquery-mask-plugin/dist/jquery.mask.min.js') ?>"></script>
<script charset="utf-8" src="<?= base_url('public/js/solicitar-atendimento.js') ?>"></script>

<script>
	//CHAT
	!function() {
		var t;
		if (t = window.driftt = window.drift = window.driftt || [], !t.init) return t.invoked ? void (window.console && console.error && console.error("Drift snippet included twice.")) : (t.invoked = !0,
		t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ],
		t.factory = function(e) {
		return function() {
			var n;
			return n = Array.prototype.slice.call(arguments), n.unshift(e), t.push(n), t;
		};
		}, t.methods.forEach(function(e) {
		t[e] = t.factory(e);
		}), t.load = function(t) {
		var e, n, o, i;
		e = 3e5, i = Math.ceil(new Date() / e) * e, o = document.createElement("script"),
		o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + i + "/" + t + ".js",
		n = document.getElementsByTagName("script")[0], n.parentNode.insertBefore(o, n);
		});
	}();
	drift.SNIPPET_VERSION = '0.3.1';
	drift.load('ksrsx8mebu82');
</script>
</body>
</html>
