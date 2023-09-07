import mongoose from 'mongoose';

const commentSchema = new mongoose.Schema({
    userName: {
        type: String,
    },
    content: {
        type: String,
        required: true,
    },
});

const Comment = mongoose.model('Comment', commentSchema);

export default Comment