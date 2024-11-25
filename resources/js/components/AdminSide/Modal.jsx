import React from 'react';


const Modal = ({ isOpen, onClose, children }) => {
    if (!isOpen) return null;

    return (
        <div className="absolute top-0 left-0 w-[100%] h-[100%] bg-transparent flex justify-center items-center z-1">
            <div className="bg-white p-[20px] rounded-md shadow-lg w-[80%] max-w-[400px]">
                <div className='flex justify-end'>
                    {/* <a className="top-[10px] right-[10px] bg-none border-none cursor-pointer text-sm" onClick={onClose}>X</a> */}
                </div>

                <div className="mt-[10px]">
                    {children}
                </div>
            </div>
        </div>
    );
};

export default Modal;
