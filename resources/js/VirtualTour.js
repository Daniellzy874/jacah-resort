
const design = { backgroundColor: "green", width: "100px", height: "100px" };

const Scene = {
    insideOne: {
        title: 'interior 1',
        image: './assets/image/pool.jpg',
        pitch: -11,
        yaw: -340,
        hotSpots: {
            flowerVase: {
                type: 'custom',
                pitch: -16.28,
                yaw: -1.66,
                cssClass: 'hotSpotElement',

            },
            chair: {
                type: 'custom',
                pitch: -34,
                yaw: -14,
                cssClass: 'hotSpotElement',

            },
            nextScene: {
                type: 'custom',
                pitch: -34,
                yaw: -50,
                cssClass: 'moveScene',
                scene: 'insideTwo'
            }
        }
    },
    insideTwo: {
        title: 'interior 2',
        image: './assets/image/garden.jpg',
        pitch: 10,
        yaw: 126,
        hotSpots: {

        }

    }
}
export default Scene;