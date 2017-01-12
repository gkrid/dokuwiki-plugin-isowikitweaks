jQuery(function () {
	jQuery(".isowikitweaks-table-border-hide-empty").each(function() {
		var $this = jQuery(this);
		$this.find("td").filter(function () {
			var $this = jQuery(this);
			if ($this.text().trim() === '') {
				return true;
			}
			return false;
		}).css("border-top", "0");
	});
});

