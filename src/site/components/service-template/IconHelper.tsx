import React from 'react';
import {
  Layers,
  ShieldCheck,
  Cpu,
  TrendingUp,
  Layout,
  Network,
  Lock,
  Zap,
  CheckCircle2,
  Headphones,
  Clock,
  Shield,
  DollarSign,
  Search,
  Code2,
  Rocket,
  Activity,
  Award,
  Workflow,
  MessageSquare,
  Users,
  Terminal,
  FileCode,
  Sparkles,
  Server,
  Database,
  Globe,
  HelpCircle,
  ArrowRight,
  ChevronDown,
  HeartPulse,
  Building2,
  ShoppingCart,
  Truck,
  GraduationCap,
  Briefcase,
  BarChart3,
  Check,
  X,
  Star,
  Bot,
  Brain,
  Smartphone,
  Cloud,
  UserCheck,
  GitBranch,
  Container,
  Box,
  Braces,
  Binary,
  Workflow as ApiIcon,
  Radio,
  FileJson,
  Component,
  Lightbulb,
  Gauge,
  Flame,
  Key,
  ShieldAlert,
  Sliders,
  Maximize2,
  Share2,
} from '@/site/icons';

interface IconHelperProps {
  name: string;
  className?: string;
}

export const ServiceIcon: React.FC<IconHelperProps> = ({ name = '', className = 'w-5 h-5' }) => {
  const cleanName = (name || '').toLowerCase().trim();

  // Tech / Framework specific mapping
  if (cleanName.includes('react') || cleanName.includes('next') || cleanName.includes('vue') || cleanName.includes('angular') || cleanName.includes('frontend')) {
    return <Code2 className={className} />;
  }
  if (cleanName.includes('node') || cleanName.includes('express') || cleanName.includes('fastapi') || cleanName.includes('java') || cleanName.includes('spring') || cleanName.includes('go') || cleanName.includes('backend') || cleanName.includes('php') || cleanName.includes('laravel')) {
    return <Server className={className} />;
  }
  if (cleanName.includes('python') || cleanName.includes('terminal') || cleanName.includes('script')) {
    return <Terminal className={className} />;
  }
  if (cleanName.includes('aws') || cleanName.includes('cloud') || cleanName.includes('azure') || cleanName.includes('gcp') || cleanName.includes('google cloud')) {
    return <Cloud className={className} />;
  }
  if (cleanName.includes('docker') || cleanName.includes('container')) {
    return <Box className={className} />;
  }
  if (cleanName.includes('kubernetes') || cleanName.includes('k8s')) {
    return <Container className={className} />;
  }
  if (cleanName.includes('postgres') || cleanName.includes('mongo') || cleanName.includes('sql') || cleanName.includes('database') || cleanName.includes('redis') || cleanName.includes('pinecone')) {
    return <Database className={className} />;
  }
  if (cleanName.includes('graphql') || cleanName.includes('rest') || cleanName.includes('api') || cleanName.includes('gateway')) {
    return <Network className={className} />;
  }
  if (cleanName.includes('ai') || cleanName.includes('gpt') || cleanName.includes('llm') || cleanName.includes('openai') || cleanName.includes('gemini') || cleanName.includes('langchain') || cleanName.includes('agent')) {
    return <Brain className={className} />;
  }
  if (cleanName.includes('bot') || cleanName.includes('chatbot')) {
    return <Bot className={className} />;
  }
  if (cleanName.includes('mobile') || cleanName.includes('flutter') || cleanName.includes('ios') || cleanName.includes('android')) {
    return <Smartphone className={className} />;
  }
  if (cleanName.includes('security') || cleanName.includes('lock') || cleanName.includes('auth') || cleanName.includes('zero-trust')) {
    return <Lock className={className} />;
  }
  if (cleanName.includes('git') || cleanName.includes('github') || cleanName.includes('devops') || cleanName.includes('ci/cd')) {
    return <GitBranch className={className} />;
  }
  if (cleanName.includes('typescript') || cleanName.includes('type')) {
    return <FileCode className={className} />;
  }
  if (cleanName.includes('kafka') || cleanName.includes('event') || cleanName.includes('stream') || cleanName.includes('zap')) {
    return <Zap className={className} />;
  }
  if (cleanName.includes('analytics') || cleanName.includes('metric') || cleanName.includes('chart') || cleanName.includes('data')) {
    return <BarChart3 className={className} />;
  }
  if (cleanName.includes('speed') || cleanName.includes('performance') || cleanName.includes('gauge') || cleanName.includes('latency')) {
    return <Gauge className={className} />;
  }

  // Exact icon cases
  switch (cleanName) {
    case 'layers':
      return <Layers className={className} />;
    case 'shieldcheck':
    case 'shield-check':
      return <ShieldCheck className={className} />;
    case 'cpu':
      return <Cpu className={className} />;
    case 'trendingup':
    case 'trending-up':
      return <TrendingUp className={className} />;
    case 'layout':
      return <Layout className={className} />;
    case 'network':
      return <Network className={className} />;
    case 'lock':
      return <Lock className={className} />;
    case 'zap':
      return <Zap className={className} />;
    case 'checkcircle2':
    case 'check-circle':
      return <CheckCircle2 className={className} />;
    case 'headphones':
      return <Headphones className={className} />;
    case 'clock':
      return <Clock className={className} />;
    case 'shield':
      return <Shield className={className} />;
    case 'dollarsign':
    case 'dollar-sign':
      return <DollarSign className={className} />;
    case 'search':
      return <Search className={className} />;
    case 'code2':
    case 'code':
      return <Code2 className={className} />;
    case 'rocket':
      return <Rocket className={className} />;
    case 'activity':
      return <Activity className={className} />;
    case 'award':
      return <Award className={className} />;
    case 'workflow':
      return <Workflow className={className} />;
    case 'messagesquare':
    case 'message-square':
      return <MessageSquare className={className} />;
    case 'users':
      return <Users className={className} />;
    case 'terminal':
      return <Terminal className={className} />;
    case 'filecode':
    case 'file-code':
      return <FileCode className={className} />;
    case 'server':
      return <Server className={className} />;
    case 'database':
      return <Database className={className} />;
    case 'globe':
      return <Globe className={className} />;
    case 'healthcare':
    case 'heartpulse':
      return <HeartPulse className={className} />;
    case 'finance':
    case 'building2':
    case 'building':
      return <Building2 className={className} />;
    case 'retail':
    case 'ecommerce':
    case 'shoppingcart':
      return <ShoppingCart className={className} />;
    case 'logistics':
    case 'truck':
      return <Truck className={className} />;
    case 'education':
    case 'graduationcap':
      return <GraduationCap className={className} />;
    case 'realestate':
    case 'briefcase':
      return <Briefcase className={className} />;
    case 'analytics':
    case 'barchart3':
      return <BarChart3 className={className} />;
    case 'bot':
      return <Bot className={className} />;
    case 'brain':
      return <Brain className={className} />;
    case 'smartphone':
    case 'mobile':
      return <Smartphone className={className} />;
    case 'cloud':
      return <Cloud className={className} />;
    case 'usercheck':
    case 'staffing':
      return <UserCheck className={className} />;
    default:
      return <Sparkles className={className} />;
  }
};
