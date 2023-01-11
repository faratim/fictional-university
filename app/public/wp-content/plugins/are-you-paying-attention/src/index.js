// Add Block type to block type selector
wp.blocks.registerBlockType('ourplugin/are-you-paying-attention', {
    title: "Are You Paying Attention?",
    icon: "smiley",
    category: "common",
    attributes: {
        skyColor: {type: "string"},
        grassColor: {type: "string"}
    },
    edit: function(props) {
        function updateSkyColor(e) {
            props.setAttributes({skyColor: e.target.value})
        }

        function updateGrassColor(e) {
            props.setAttributes({grassColor: e.target.value})
        }

        return (
            <div>
                {/* updates the attribute every time a key is pressed */}
                <input type="text" placeholder="sky color" value={props.attributes.skyColor} onChange={updateSkyColor}/>
                <input type="text" placeholder="grass color" value={props.attributes.grassColor} onChange={updateGrassColor}/>
            </div>
        )
    },
    save: function(props) {
        return null
    }
})