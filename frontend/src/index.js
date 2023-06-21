import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './App';
import { ProSidebarProvider } from "react-pro-sidebar";
import { BrowserRouter } from 'react-router-dom';
import './index.css';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <BrowserRouter>
      <ProSidebarProvider>
        <App />
      </ProSidebarProvider>
    </BrowserRouter>
  </React.StrictMode>
);