import http from "../api/http";

export const ChatAPI = {
    sendMessage(message) {
        return http.post("/chat", {
            message
        });
    },
    ddhere(message) {
        return http.get("/here", {
            message
        });
    }
};