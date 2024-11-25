import React, { useEffect, useState } from 'react'
import { Fade, Zoom, Slide } from 'react-slideshow-image'
import ReactDOM from 'react-dom/client';
import { createPortal } from 'react-dom';
function Testimony() {

    const [records, setRecords] = useState([{}]);
    useEffect(() => {
        const getUserdata = async () => {
            const reqdata = await fetch('http://127.0.0.1:8000/testimony');
            const resdata = await reqdata.json();
            // console.log(resdata);
            setRecords(resdata)
        }
        getUserdata();
    }, []);

    const rating = records.map((star) => parseInt(star.star));

    const stars = document.querySelectorAll('.star');
    stars.forEach((s, i) => {
        if (i < rating) {
            s.style.add('filled');
        } else {
            s.classList.remove('filled');
        }
    });
    const style = {
        fontSize: "2rem",
        color: "gold",
        /* Default unfilled color */
        cursor: "pointer",
        transition: "color 0.3s ease"
    }
    const filled = { color: "gold" }
    return (
        <>
            <Fade>
                {records.map((tes, key) => (
                    <div className="tour-desc bg-white" key={key}>
                        <div className="px-[100px]">
                            <div className="flex justify-center items-center">
                                <i style={{ style }} className='star bx bxs-star text-2xl'></i>
                                <i className='star bx bxs-star text-2xl'></i>
                                <i className='star bx bxs-star text-2xl'></i>
                                <i className='star bx bxs-star text-2xl'></i>
                                <i className='star bx bxs-star text-2xl'></i>
                            </div>
                            <div className="tour-text color-grey-3 text-center">&ldquo;{tes.testimony}&rdquo;</div>
                            <div className="flex items-center justify-center">
                                <div>
                                    <div className="d-flex justify-content-center pt-2 pb-2"><img className="tm-people" src={'assets/image/pofile_pic_default/PROF-PIC.png'} alt="" /></div>
                                    <div className="link-name d-flex justify-content-center">Billy Villanueva</div>
                                    <div className="link-position d-flex justify-content-center">Customer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                ))}
            </Fade>
        </>

    )
}
const root = ReactDOM.createRoot(document.getElementById('testimonial'));
root.render(<Testimony />);
export default Testimony
