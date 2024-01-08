import { PageProps as InertiaPageProps } from '@inertiajs/core';
import { AxiosInstance } from 'axios';
import ziggyRoute, { Config as ZiggyConfig } from 'ziggy-js';
import { PageProps as AppPageProps } from './';

declare global {
    interface Window {
        axios: AxiosInstance
        url : String
    }

    var route: typeof ziggyRoute;
    var Ziggy: ZiggyConfig;
}

declare module 'vue' {
    interface ComponentCustomProperties {
        route: typeof ziggyRoute;
    }
}

declare module '@inertiajs/core' {
    interface PageProps extends InertiaPageProps, AppPageProps {}
}

export interface Notification {
    id: string;
    type: string;
    title: string;
    message: string;
    autoClose: boolean;
    duration: number;
  }

export type CreateNotification = {
(options: {
    type?: string;
    title?: string;
    message?: string;
    autoClose?: boolean;
    duration?: number;
}): void;
};



