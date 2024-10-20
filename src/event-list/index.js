
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import ServerSideRender from "@wordpress/server-side-render";

import './style.scss';
import metadata from './block.json';



const Edit = () => {
	return(
		<div { ...useBlockProps() }>
			<ServerSideRender block="create-block/eventify-block-pack"/>
		</div>
	)
}

registerBlockType( metadata.name, {
	edit: Edit,
} );

