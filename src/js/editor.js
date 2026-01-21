/* global wp, __ */
// Editor theme utilities
const editorUtils = {
	/**
	 * Add custom classes to blocks based on attributes
	 */
	addBlockClasses: function () {
		const { addFilter } = wp.hooks;
		addFilter(
			'blocks.getSaveContent.extraProps',
			'ma-theme/add-block-classes',
			(props, blockType, attributes) => {
				if (blockType.name === 'core/group' && attributes.className) {
					props.className = attributes.className;
				}
				return props;
			}
		);
	},

	/**
	 * Customize block editor sidebar
	 */
	customizeSidebar: function () {
		const { registerPlugin } = wp.plugins;
		const { PluginSidebar } = wp.editPost;
		const { PanelBody } = wp.components;

		const Sidebar = () => {
			return wp.element.createElement(
				PluginSidebar,
				{
					name: 'ma-theme-sidebar',
					title: __('Medical Academic Settings', 'ma-theme'),
					icon: 'admin-appearance',
				},
				wp.element.createElement(
					PanelBody,
					{ title: __('Theme Options', 'ma-theme') },
					wp.element.createElement(
						'p',
						null,
						'Custom theme options go here.'
					)
				)
			);
		};

		registerPlugin('ma-theme-sidebar', {
			icon: 'admin-appearance',
			render: Sidebar,
		});
	},
};

// Initialize editor enhancements
wp.domReady(function () {
	editorUtils.addBlockClasses();
	editorUtils.customizeSidebar();
});
