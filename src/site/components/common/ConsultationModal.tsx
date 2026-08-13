import React, { useState } from 'react';
import { X, CheckCircle2, Sparkles, Send } from '@/site/icons';

interface ConsultationModalProps {
  isOpen: boolean;
  onClose: () => void;
  defaultTopic?: string;
}

export const ConsultationModal: React.FC<ConsultationModalProps> = ({
  isOpen,
  onClose,
  defaultTopic = 'Get a Free Consultation',
}) => {
  const [submitted, setSubmitted] = useState(false);
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    phone: '',
    service: defaultTopic,
    message: '',
  });

  if (!isOpen) return null;

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    setSubmitted(true);
    setTimeout(() => {
      setSubmitted(false);
      onClose();
      setFormData({
        name: '',
        email: '',
        phone: '',
        service: defaultTopic,
        message: '',
      });
    }, 2200);
  };

  return (
    <div className="fixed inset-0 z-[1100] flex items-center justify-center p-4 bg-black/70 backdrop-blur-md animate-in fade-in duration-200">
      <div className="bg-white rounded-2xl max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-[#F3F5F7] relative overflow-hidden">
        {/* Decorative Top Accent */}
        <div className="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-[#264868] via-[#264868] to-[#153758]" />

        <button
          onClick={onClose}
          className="absolute top-5 right-5 p-2 rounded-full text-[#93A3B2] hover:text-[#5C6B7A] hover:bg-[#F3F5F7] transition-colors"
          id="close-consultation-modal"
        >
          <X className="w-5 h-5" />
        </button>

        {submitted ? (
          <div className="text-center py-8 space-y-4 animate-in zoom-in-95 duration-300">
            <div className="w-16 h-16 bg-[#EDF0F3] text-[#264868] rounded-full flex items-center justify-center mx-auto">
              <CheckCircle2 className="w-10 h-10" />
            </div>
            <h3 className="text-2xl font-bold text-[#153758]">Consultation Requested!</h3>
            <p className="text-sm text-[#5C6B7A] max-w-sm mx-auto">
              Thank you! Our solutions architect from Octavia Tech Solutions will contact you within 24 hours.
            </p>
          </div>
        ) : (
          <div>
            <div className="flex items-center gap-2 text-[#264868] text-xs font-bold uppercase tracking-wider mb-1">
              <Sparkles className="w-4 h-4" />
              <span>Octavia Tech Solutions</span>
            </div>
            <h2 className="text-2xl font-bold text-[#153758] tracking-tight mb-2">
              Get a Free Consultation
            </h2>
            <p className="text-xs text-[#5C6B7A] mb-6">
              Fill out the form below to connect with our experts for custom web, mobile, AI, and cloud solutions.
            </p>

            <form onSubmit={handleSubmit} className="space-y-4">
              <div>
                <label className="block text-xs font-semibold text-[#153758] mb-1">Full Name *</label>
                <input
                  type="text"
                  required
                  placeholder="e.g. Sarah Jenkins"
                  value={formData.name}
                  onChange={(e) => setFormData({ ...formData, name: e.target.value })}
                  className="w-full px-3.5 py-2.5 text-sm border border-[#DDE3E9] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#264868]/30 focus:border-[#264868] transition-all"
                />
              </div>

              <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label className="block text-xs font-semibold text-[#153758] mb-1">Work Email *</label>
                  <input
                    type="email"
                    required
                    placeholder="sarah@company.com"
                    value={formData.email}
                    onChange={(e) => setFormData({ ...formData, email: e.target.value })}
                    className="w-full px-3.5 py-2.5 text-sm border border-[#DDE3E9] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#264868]/30 focus:border-[#264868] transition-all"
                  />
                </div>
                <div>
                  <label className="block text-xs font-semibold text-[#153758] mb-1">Phone Number</label>
                  <input
                    type="tel"
                    placeholder="+1 (555) 000-0000"
                    value={formData.phone}
                    onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
                    className="w-full px-3.5 py-2.5 text-sm border border-[#DDE3E9] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#264868]/30 focus:border-[#264868] transition-all"
                  />
                </div>
              </div>

              <div>
                <label className="block text-xs font-semibold text-[#153758] mb-1">Service / Area of Interest</label>
                <select
                  value={formData.service}
                  onChange={(e) => setFormData({ ...formData, service: e.target.value })}
                  className="w-full px-3.5 py-2.5 text-sm border border-[#DDE3E9] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#264868]/30 focus:border-[#264868] transition-all bg-white"
                >
                  <option value="Get a Free Consultation">General Consultation</option>
                  <option value="Web & Mobile Development">Web & Mobile Development</option>
                  <option value="AI & Data Engineering">AI & Data Engineering</option>
                  <option value="Cloud & Cyber Security">Cloud & Cyber Security</option>
                  <option value="Healthcare Technology">Healthcare Technology</option>
                  <option value="SaaS & Enterprise ERP">SaaS & Enterprise ERP</option>
                </select>
              </div>

              <div>
                <label className="block text-xs font-semibold text-[#153758] mb-1">Project Details</label>
                <textarea
                  rows={3}
                  placeholder="Tell us about your objectives, timeline, or requirements..."
                  value={formData.message}
                  onChange={(e) => setFormData({ ...formData, message: e.target.value })}
                  className="w-full px-3.5 py-2.5 text-sm border border-[#DDE3E9] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#264868]/30 focus:border-[#264868] transition-all"
                />
              </div>

              <button
                type="submit"
                className="w-full py-3 px-6 text-sm font-bold text-white bg-[#264868] hover:bg-[#153758] rounded-xl shadow-lg shadow-[#264868]/30 transition-all flex items-center justify-center gap-2 mt-2"
              >
                <Send className="w-4 h-4" />
                <span>Submit Request</span>
              </button>
            </form>
          </div>
        )}
      </div>
    </div>
  );
};
